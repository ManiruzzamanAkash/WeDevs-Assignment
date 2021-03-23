<template>
    <people-extra-fields v-if="shouldRender" people-type="customer" section="bottom" />
</template>

<script>
import PeopleExtraFields from './PeopleExtraFields.vue';

export default {
    name: 'CustomerExtraFieldsBottom',

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
