Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'work',
            path: '/work',
            component: require('./components/Tool'),
        },
    ])
})
