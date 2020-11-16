<template>
<div>
<div class="uk-margin uk-form-width-medium uk-margin-medium-top" >
            <select  class="uk-select" v-model="selected" @change="LoadBets()">
                <option v-for="option in options" :value="option.key">{{option.title}}</option>
            </select>
        </div>
<table class="uk-table uk-table-responsive uk-table-divider uk-table-hover uk-table-small uk-table-middle uk-table-responsive ">
<caption class="uk-text-left">Bets</caption>
<thead >
        <tr>
            <th class="uk-text-left">TIME</th>
            <th class="uk-text-left">TEAM 1</th>
            <th class="uk-text-left">TEAM 2</th>
            <th class="uk-text-left">WIN 1</th>
            <th class="uk-text-left">DRAW</th>
            <th class="uk-text-left">WIN 2</th>
        </tr>
    </thead>
    <tbody v-for="bet in bets">
      <!--  {{ bet.sport_nice }} -->
        <tr>
            <td>{{ bet.commence_time}}</td>
            <td>{{ bet.teams[0]}}</td>
            <td>{{ bet.teams[1]}}</td>
            <td><button class="uk-button uk-button-default" type="button">{{ bet.sites[0].odds.h2h[0]}}</button></td>
            <td><button class="uk-button uk-button-default" type="button">{{ bet.sites[0].odds.h2h[1]}}</button></td>
            <td><button class="uk-button uk-button-default" type="button">{{ bet.sites[0].odds.h2h[2]}}</button></td>
        </tr>
    </tbody>
</table>
</div>
</template>

<script>
    import axios from 'axios';

    export default {
        data: function() {
            return {
                selected: 'soccer_uefa_champs_league',
                options: [
                    {
                        title: "Champions League",
                        key: "soccer_uefa_champs_league"
                    },
                    {
                        title: "La Liga",
                        key: "soccer_spain_la_liga"
                    }
                ],
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
                        'sport': this.selected,
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