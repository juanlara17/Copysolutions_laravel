const api_search_autocomplete = new Vue({
    el: '#api_search_autocomplete',
    data: {
        word_to_search: '',
        results: [],
    },
    methods: {
        autocomplete() {
            this.results = [];

            if (this.word_to_search.length > 2) {
                axios.get('/api/autocomplete',
                    {params: {wordsearch: this.word_to_search}}
                ).then(response => {
                    this.results = response.data;
                    console.log(response.data);
                    // console.log('Se cargaron correctamente los datos');
                });
            }
        },
       /* select(resultado) {
            this.word_to_search = resultado.name;
            this.$nextTick( () => {
                this.submit();
            });
            // this.submit();
        },*/
        async select(result) {
            this.word_to_search = result.name;
            await this.$nextTick();
            this.submit();
        },
        submit() {
            // alert('Hola');
            console.log('Estoy ejecuntando el submitform');
            this.$refs.SubmitButtonSearch.click();
        }
    },
    mounted() {
        console.log('Se cargaron correctamente los datos');
    }
});

