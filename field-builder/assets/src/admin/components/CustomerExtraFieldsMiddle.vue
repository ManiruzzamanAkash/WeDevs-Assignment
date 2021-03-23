<template>
    <people-extra-fields v-if="shouldRender" people-type="customer" section="middle" />
</template>

<script>
import PeopleExtraFields from './PeopleExtraFields.vue';

export default {
    name: 'CustomerExtraFieldsMiddle',

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
