<template>

  <div class="container">

      <h1 class="text-center">
        <button class="btn btn-primary" @click="creerNouveauChapitre()">
          Nouveau Chapitre
        </button>
      </h1>

      <div class="accordion" id="accordion-chapitres">

        <div class="card" v-for="(chapitre, index) in formattedChapitres">
          <h3 class="card-title">
            <a class="d-flex" data-toggle="collapse" data-parent="#accordion-chapitres" :href="'#collapse-chapitres-'+index">
              <span class="mr-auto">{{ chapitre.libelle }}</span>
              <span class="text-lighter hidden-sm-down"><i class="fa fa-map-marker mr-8"></i> San Francisco</span>
            </a>
          </h3>

          <div :id="'collapse-chapitres-'+index" class="collapse in">
            <div class="card-block">
              <p>{{ chapitre.description }}</p>

              <div class="row">
                <sessions-list :default_sessions="chapitre.sessions"></sessions-list>
              </div>

            </div>
          </div>
        </div>

      </div>

      <creer-chapitre></creer-chapitre>
    </div>

</template>

<script>
    export default {
        props: ['default_chapitres'],
        components: {
          "creer-chapitre": require('./children/CreerChapitre.vue').default,
          "sessions-list": require('./children/SessionsList.vue').default
        },
        data() {
            return {
                chapitres: this.default_chapitres
            }
        },
        computed: {
            formattedChapitres() {
                return JSON.parse(this.chapitres)
            }
        },
        methods: {
    			creerNouveauChapitre() {
    				this.$emit('creer_nouveau_chapitre', this.cour_id)
    			},
        }
    }
</script>
