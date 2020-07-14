<template>
    <div class="price_element">
        <div class="container_variations mt-2">
                <div class="select_data">
                    <h3>Dimension</h3>
                    <v-select v-model="dimension" class="select_data" :options="this.dimens"  :on-change="showPrice"></v-select>
                </div>

                <div class="select_data">
                    <h3>Quantity</h3>
                    <v-select v-model="quantity" class="select_data" :options="quantities" on-change="showPrice"></v-select>
                </div>
        </div>

        <div v-if="show_price" class="product-section-price">
           <strong>Price: </strong> ${{ product.price }}
        </div>
    </div>
</template>

<script>
    import 'vue-select/dist/vue-select.css';
    import vSelect from 'vue-select'
    Vue.component('v-select', vSelect)

    export default {
        props: ['dimens','product'],
        data() {
            return {
                quantities: [250,500,1000,5000,10000,20000,50000,100000],
                show_price: false,
                dimension: null,
                quantity: null
            }
        },
        mounted() {
            console.log(this.dimens)
        },
        methods: {
            selected_dimension() {
            }
        },
        computed: {
            showPrice: function () {
                if (this.dimension && this.quantity) {
                    this.show_price = true;
                }
            }
        }
    }
</script>

<style scoped>
    .container_variations {
        display: flex;
        justify-content: space-between;
    }

    .select_data {
        margin-top: 10px;
        width: 200px;
        height: 100%;
        border-radius: 0;
    }

    .select_data h3{
        font-weight: 400;
    }

    .product-section-price {
        margin-top: 10px;
    }
</style>
