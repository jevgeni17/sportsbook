<template>
<table class="uk-table uk-table-middle uk-table-divider">
    <tbody v-for="bet in bets">
        {{ bet.sport_nice }}
        <tr>
            <td>{{ bet.commence_time}}</td>
            <td>{{ bet.teams[0]}}</td>
            <td>{{ bet.teams[1]}}</td>
            <td>1<button class="uk-button uk-button-default" type="button">{{ bet.sites[0].odds.h2h[0]}}</button></td>
            <td>x<button class="uk-button uk-button-default" type="button">{{ bet.sites[0].odds.h2h[1]}}</button></td>
            <td>2<button class="uk-button uk-button-default" type="button">{{ bet.sites[0].odds.h2h[2]}}</button></td>
        </tr>
    </tbody>
</table>
</template>

<script>
    import axios from 'axios';

    export default {
        data: function() {
            return {
                bets: []
            }
        },
        mounted() {
            this.LoadBets();
        },
        methods: {
            LoadBets() {
                axios.get('https://api.the-odds-api.com/v3/odds', {
                    params: {
                        'api_key': process.env.MIX_BETTING_API_KEY,
                        'sport': "soccer_uefa_champs_league",
                        'region': 'eu',
                        'mkt': 'h2h',
                        'dateFormat': 'iso'
                    }
                }).then(response => {
                    this.bets = response.data.data;

                }).catch(error => {
                    console.log(error);
                })
            }
        }
    }
</script>