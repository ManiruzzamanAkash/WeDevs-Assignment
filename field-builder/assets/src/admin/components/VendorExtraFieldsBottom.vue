<template>
    <people-extra-fields v-if="shouldRender" people-type="vendor" section="bottom" />
</template>

<script>
import PeopleExtraFields from './PeopleExtraFields.vue';

export default {
    name: 'VendorExtraFieldsBottom',

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
