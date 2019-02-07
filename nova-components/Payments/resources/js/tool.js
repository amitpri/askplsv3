Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'payments',
            path: '/payments',
            component: require('./components/Tool'),
        },
    ])
})
