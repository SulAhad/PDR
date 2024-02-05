const { createApp, ref } = Vue

    createApp({
    setup() {
        const title = ref('Производство')
        return {
            title
        }
    }
    }).mount('#production')