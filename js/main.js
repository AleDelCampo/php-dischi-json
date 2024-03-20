const { createApp } = Vue;

createApp({
    data() {
        return {
            diskList: [],
            myDiskList: [],
            showOverlay: false,
            selectedDisk: null,
        }
    },

    methods: {
        showCard(index, type) {
            this.showOverlay = true;
            this.selectedDisk = (type === 'original') ? this.diskList[index] : { poster: this.myDiskList[index].image[3]['#text'] };
        },
    
        closeOverlay() {
            this.showOverlay = false;
            this.selectedDisk = null;
        },
    
        myDisks() {

            const artists = ['Slipknot', 'Fleetwood Mac', 'Tool', 'Metallica'];

            const requests = artists.map(artist => {
                return axios.get('https://ws.audioscrobbler.com/2.0/', {
                    params: {
                        method: 'artist.getTopAlbums',
                        artist,
                        api_key: '499797c00bbea1a764ec4d41d531d2eb',    
                        format: 'json'
                    }
                });
            });
    
            axios.all(requests)
                .then(responses => {
                    responses.forEach(response => {
                        const albums = response.data.topalbums.album.map(album => ({
                            ...album,
                            image: album.image
                        }));
                        this.myDiskList.push(...albums);
                    });
                })
        }
    },

    mounted() {
        axios.get('./server.php')
            .then(res => {
                this.diskList = res.data;
                this.myDisks();
            })
    },
}).mount('#app');