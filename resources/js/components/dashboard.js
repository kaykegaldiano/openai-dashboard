export default () => ({
    loading: false,
    generateReport() {
        this.loading = true

        const sizes = this.$refs.vegalitecontainer.getBoundingClientRect()

        this.$wire.generateReport()
            .then(result => {
                let dataset = this.$wire.get('dataset')

                result.data = dataset
                result.height = sizes.height
                result.width = sizes.width

                console.log(dataset, result, sizes)

                window.vegaEmbed('#vis', result)

                this.loading = false
            })
            .catch(error => {
                this.loading = false
                console.log(error)
            })
    }
})