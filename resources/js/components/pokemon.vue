
<!-- <template>
    <table>
        <thead>
            <tr>
                <th>Pokemon</th>
                
            </tr>
        </thead>
        <tbody v-for="poke in pokemon">
            <tr>
                 <img :src="'/img/red-blue/' + poke.id + '.png'" :alt="poke.name"/>
            </tr>
            <tr>
                <td>{{poke.name}}</td>
            </tr>
        </tbody>
    </table>
  </template> -->

<template>
  <div id="pokemon" v-for="poke in pokemon" :key="pokemon.id">
    {{ poke.name }}
    <img :src="'/img/red-blue/' + poke.id + '.png'" :alt="poke.name"/>
  </div>
</template>

<script>
import axios from "axios"

export default {

        
  data() {
    return {
      pokemon: [],
    };
  },

  mounted() {

    this.fetchPokemon();
  },

  methods: {
    fetchPokemon() {
      axios
        .get('http://127.0.0.1:8000/api/pokemon/')
        .then(response => { this.pokemon = response.data })
        .catch(error => console.log(error))
    }
  },


}

</script>