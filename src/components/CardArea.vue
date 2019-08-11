<template>
    <div>
    <b-card class="text-left" header="Dependency Packages" >
        <b-card-text class="bg-default text-dark">
            <ul>
                <li v-for="pack in packageList" v-bind:key="pack.id">{{ pack.name }}</li>
            </ul>
        </b-card-text>
    </b-card>
    </div>
</template>

<script>
import store from '../store';
export default {
    computed: {
        packageList(){
            return this.$store.getters.getPackages;
        }
    },
    watch: {
        packageList(newVal, oldVal){
            //console.log('watch', newVal);
        }
    }
}
</script>
