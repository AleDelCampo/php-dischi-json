const { createApp } = Vue;

createApp({
    data() {
        return {
            diskList: [],
        }
    },

    mounted() {

        axios.get('./dischi.json').then(res => {
            console.log(res.data);

            this.diskList = res.data;
        });

    },
}).mount('#app');