<template>
    <div>
        <div class="well well-sm">
            <form class="form-horizontal" @submit.prevent="onSubmit">
                <fieldset>
                    <legend class="text-center">Search</legend>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Departure</label>
                        <div class="col-md-9" :class="{'has-error': errors.departureAirport}">

                            <vue-select v-model="searchQuery.departureAirport"
                                        :options="airports"
                                        :settings="{ placeholder: 'Specifies the placeholder through settings' }"/>

                            <span v-if="errors.departureAirport"
                                  class="help-block text-danger">{{ errors.departureAirport[0] }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Arrival</label>
                        <div class="col-md-9" :class="{'has-error': errors.arrival}">

                            <vue-select v-model="searchQuery.arrivalAirport"
                                        :options="airports"
                                        :settings="{ placeholder: 'Specifies the placeholder through settings' }"/>

                            <span v-if="errors.arrivalAirport" class="help-block text-danger">{{ errors.arrivalAirport[0] }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Select Date</label>
                        <div class="col-md-9" :class="{'has-error': errors.departureDate}">

                            <date-picker v-model="searchQuery.departureDate" valueType="format" lang="en"></date-picker>

                            <span v-if="errors.departureDate" class="help-block text-danger">{{ errors.departureDate[0] }}</span>
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

                <div class="jumbotron" v-for="result in searchResults">
                    <h3 class="display-4">{{ result.flightNumber }}</h3>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                        attention to featured content or information.</p>
                    <hr class="my-4">
                    <a class="btn btn-primary" data-toggle="collapse" :href="result.flightNumber" role="button"
                       aria-expanded="false" :aria-controls="result.flightNumber">
                        More information
                    </a>
                    <div class="collapse" :id="result.flightNumber">
                        <div class="card card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                            ea proident.
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
                isSending: false,
                isFetched: false,
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
            axios.get('api/v1/airports/list', {
                auth: {
                    username: 'admin',
                    password: 'secret'
                },
            })
                .then(({data}) => this.airports = data)
                .catch(function (response) {
                    console.log(response);
                });
        },

        methods: {
            onSubmit() {
                this.saved = false;

                axios.post('api/v1/search', this.searchQuery, {
                    auth: {
                        username: 'admin',
                        password: 'secret'
                    },
                })
                    .then(({data}) => this.setSuccessMessage(data))
                    .catch(({response}) => this.setErrors(response));
            },

            setErrors(response) {
                this.errors = response.data.errors;
            },

            setSuccessMessage(data) {
                this.searchResults = data.searchResults;
                this.isFetched = true;
            },

            reset() {
                this.errors = [];
                this.isFetched = false;
                this.searchQuery = {departureAirport: null, arrivalAirport: null, departureDate: null};
            }
        }
    }
</script>
