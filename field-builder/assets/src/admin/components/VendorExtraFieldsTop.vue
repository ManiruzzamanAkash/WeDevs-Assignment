<template>
    <people-extra-fields v-if="shouldRender" people-type="vendor" section="top" />
</template>

<script>
import PeopleExtraFields from './PeopleExtraFields.vue';

export default {
    name: 'VendorExtraFieldsTop',

    components: {
        PeopleExtraFields
    },

    computed: {
        shouldRender() {
            return 'Vendors' === this.$route.name || 'VendorDetails' === this.$route.name;
        }
    }
}
</script>
