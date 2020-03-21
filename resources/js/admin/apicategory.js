const app = new Vue({
    el: '#apicategory',
    data: {
        nombre: '',
        nameTemp: '',
        slug: '',
        div_mensaje_slug: 'Existing',
        div_clase_slug: 'badge badge-danger',
        div_aparecer: false,
        disable_button: 1
    },
    computed: {
        generarSLug : function(){
            var char= {
                "á":"a","é":"e","í":"i","ó":"o","ú":"u",
                "Á":"A","É":"E","Í":"I","Ó":"O","Ú":"U",
                "ñ":"n","Ñ":"N"," ":"-","_":"-"
            }
            var expr = /[áéíóúÁÉÍÓÚÑñ_ ]/g;
            this.slug = this.nombre.trim().replace(expr, function(e){
                return char[e]
            }).toLowerCase()
            return this.slug;
            //return this.nombre.trim().replace(/ /g,'-').toLowerCase()
        }
    },
    methods: {
        getCategory() {
            if (this.slug) {
                let url = '/api/category/' + this.slug;
                axios.get(url).then(response => {
                    this.div_mensaje_slug = response.data;
                    // console.log(this.div_mensaje_slug);
                    if (this.div_mensaje_slug === 'Available') {
                        this.div_clase_slug = 'badge badge-success';
                        this.disable_button = 0;
                    } else {
                        this.div_clase_slug = 'badge badge-danger';
                        this.disable_button = 1;
                    }
                    this.div_aparecer = true;

                    if (document.getElementById('nameTemp')) {
                        if (document.getElementById('nameTemp').innerHTML === this.nombre) {
                            this.disable_button = 0;
                            this.div_mensaje_slug = '';
                            this.div_clase_slug = '';
                            this.div_aparecer = false;
                        }
                    }
                });
            } else {
                this.div_clase_slug = 'badge badge-success';
                this.div_mensaje_slug = 'Write category';
                this.disable_button = 1;
                this.div_aparecer = true;
            }

        }
    },
    mounted() {
        if (document.getElementById('nameTemp')) {
            this.nombre = document.getElementById('nameTemp').innerHTML;
            this.disable_button = 0;
        }
    }
});
