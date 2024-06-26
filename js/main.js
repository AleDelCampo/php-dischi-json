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
        albumClick(index) {
            axios.get('./server.php?discIndex=' + index)
                .then(res => {
                    this.selectedDisk = res.data;
                    this.showOverlay = true;
                });
        },

        albumClickMyDisk(index) {
            const selectedMyDisks = this.myDiskList[index];
            this.selectedDisk = {
                title: selectedMyDisks.name,
                author: selectedMyDisks.artist.name,
                poster: selectedMyDisks.image[3]['#text']
            };
            this.showOverlay = true;
        },

        closeOverlay() {
            this.showOverlay = false;
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
                });
        }
    },

    mounted() {
        axios.get('./server.php')
            .then(res => {
                this.diskList = res.data;
                this.myDisks();
            });
    },
}).mount('#app');