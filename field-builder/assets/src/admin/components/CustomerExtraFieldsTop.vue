<template>
    <people-extra-fields v-if="shouldRender" people-type="customer" section="top" />
</template>

<script>
import PeopleExtraFields from './PeopleExtraFields.vue';

export default {
    name: 'CustomerExtraFieldsTop',

    components: {
        PeopleExtraFields
    },

    computed: {
        shouldRender() {
            return 'Customers' === this.$route.name || 'CustomerDetails' === this.$route.name;
        }
    }
}
</script>
