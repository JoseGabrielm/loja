  {{-- alpine scroll infinite --}}
  <div x-data="{
    observe () {
        let observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    @this.call('scrollLoadMore')
                }
            })
        }, {
            root: null
        })

        observer.observe(this.$el)
    }
}"
x-init="observe"
>
</div>