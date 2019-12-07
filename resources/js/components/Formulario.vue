<template>
    <form action="" method="POST">
        <?php @csrf ?>
        <div class="form-group row">
            <label for="name">Name:  </label>
            <input v-model="name" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group row">
            <label for="slug">Slug: </label>
            <input readonly v-model="generarSlug" type="text" class="form-control" name="slug" id="slug">
        </div>

        <div class="form-group row">
            <label for="description">Description:  {{ generarSlug }}</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>

        <div class="form-group">
            <div>
                <button type="submit" value="send" class="btn btn-primary float-right">Send</button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return{
                name: 'Juan Felipe Lara Martínez',
            }
        },
        computed: {
            generarSlug: function () {
                let char = {
                    "á":"a","é":"e","í":"i","ó":"o","ú":"u",
                    "Á":"A","É":"E","Í":"I","Ó":"O","Ú":"U",
                    "ñ":"n","Ñ":"N"," ":"-","_":"-"
                }
                let expr = /[áéíóúÁÉÍÓÚñÑ _]/g;
                return this.name.trim().toLowerCase().replace(expr, function (e) {
                    return char[e];
                })
                // return this.name.trim().replace(/ /g,'-').toLowerCase()
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
