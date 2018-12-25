Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'workspace',
            path: '/workspace',
            component: require('./components/Tool'),
        },
    ])
})
