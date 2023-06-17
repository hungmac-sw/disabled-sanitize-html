const { Component } = Shopware;

Component.override('sw-code-editor', {
    methods: {
        async sanitizeEditorInput(value) {
            this.sanitizeInput = false;

            return this.$super('sanitizeEditorInput', value);
        },
    },
});
