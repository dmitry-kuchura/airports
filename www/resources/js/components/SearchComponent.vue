<template>
    <div>
        <loader v-if="isLoading"></loader>

        <div class="well well-sm">
            <form class="form-horizontal" @submit.prevent="onSubmit">
                <fieldset>
                    <legend class="text-center">Search</legend>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Departure</label>
                        <div class="col-md-9" :class="{'has-error': errors['searchQuery.departureAirport']}">

                            <vue-select v-model="searchQuery.departureAirport"
                                        :options="airports"
                                        :settings="{ placeholder: 'Please, select Departure Airport' }"/>

                            <span v-if="errors['searchQuery.departureAirport']" class="help-block text-danger">{{ errors['searchQuery.departureAirport'][0] }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Arrival</label>
                        <div class="col-md-9" :class="{'has-error': errors['searchQuery.arrivalAirport']}">

                            <vue-select v-model="searchQuery.arrivalAirport"
                                        :options="airports"
                                        :settings="{ placeholder: 'Please, select Arrival Airport' }"/>

                            <span v-if="errors['searchQuery.arrivalAirport']" class="help-block text-danger">{{ errors['searchQuery.arrivalAirport'][0] }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Select Date</label>
                        <div class="col-md-9" :class="{'has-error': errors['searchQuery.departureDate']}">

                            <date-picker v-model="searchQuery.departureDate" valueType="format" lang="en"
                                         :not-before="new Date()"></date-picker>

                            <span v-if="errors['searchQuery.departureDate']" class="help-block text-danger">{{ errors['searchQuery.departureDate'][0] }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

        <div class="well well-sm" v-if="isFetched">
            <fieldset>
                <legend class="text-center">Results:</legend>

                <div class="alert alert-warning" v-if="emptyResults">
                    <strong>Sorry!</strong> No flight on this day! Please, choose another date departure.
                </div>

                <div class="jumbotron jumbotron-fluid" v-if="!emptyResults" v-for="result in searchResults">
                    <div class="container">
                        <h3 class="display-4">✈ Flight Number: {{ result.flightNumber }}</h3>
                        <p class="lead">Transporter: {{ result.transporter.name + " " + result.transporter.code }}</p>
                        <p class="lead">Travel time: {{ Math.floor(result.duration / 60) + " hours " + result.duration %
                            60 + " minutes" }} </p>

                        <hr class="my-4">

                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="display-4">✈ Departure Airport: {{ result.departureAirport }}</h4>
                                <p class="lead">Departure time: {{ result.departureDateTime }}</p>
                            </div>
                            <div class="col-md-6">
                                <h4 class="display-4">✈ Arrival Airport: {{ result.arrivalAirport }}</h4>
                                <p class="lead">Arrival time: {{ result.arrivalDateTime }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </fieldset>
        </div>

    </div>
</template>

<script>
    export default {

        data() {
            return {
                airports: [],
                isLoading: true,
                isFetched: false,
                emptyResults: true,
                searchResults: [],
                searchQuery: {
                    departureAirport: null,
                    arrivalAirport: null,
                    departureDate: null,
                },
                errors: [],
            };
        },

        mounted() {
            axios.get("api/v1/airports/list")
                .then(({data}) => this.setAirportsSuccessResponse(data))
                .catch((response) => this.setAirportsErrorResponse(response));
        },

        methods: {
            onSubmit() {
                this.isLoading = true;

                axios.post("api/v1/search", {"searchQuery": this.searchQuery})
                    .then(({data}) => this.setSuccessResponse(data))
                    .catch(({response}) => this.setErrorResponse(response));
            },

            setSuccessResponse(data) {
                this.isLoading = false;
                this.searchResults = data.searchResults;
                this.emptyResults = !data.searchResults.length;
                this.errors = [];
                this.isFetched = true;
            },

            setErrorResponse(response) {
                this.isLoading = false;
                this.emptyResults = true;
                this.isFetched = false;
                this.errors = response.data.errors;
                toastr.error("The given data was invalid.", "Error!");
            },

            setAirportsSuccessResponse(data) {
                this.isLoading = false;
                this.airports = data;
            },

            setAirportsErrorResponse(response) {
                this.isLoading = false;
                toastr.error("Error, maybe you forget Migrate and Seeding database?!?", "Inconceivable!")
            }
        }
    }
</script>
