const api_search_autocomplete = new Vue({
    el: '#api_search_autocomplete',
    data: {
        word_to_search: '',
        results: [],
    },
    methods: {
        autocomplete() {
            this.results = []

            if (this.word_to_search.length > 2) {
                axios.get('/api/autocomplete', {params:{ wordsearch:this.word_to_search }}
                ).then(response => {
                    this.results = response.data;
                    console.log(response.data);
                });
            }
        }
    },
    mounted() {

    }
});
