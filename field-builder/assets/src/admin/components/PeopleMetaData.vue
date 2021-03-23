<template>
    <li style="display: block">
        <div :key="index" v-for="(cData, index) in customData">
            <strong>{{ makeTitle(index) }}:</strong>
            <span>{{ formatData(cData) }}</span>
        </div>
    </li>
</template>

<script>
let HTTP = acct_get_lib('HTTP');

export default {
    name: 'PeopleMetaData',

    props: {
        peopleId: {
            type: Number
        },
        peopleType: {
            type: String
        },
    },

    data() {
        return {
            customData: []
        }
    },

    created() {
        HTTP.get(`/field-builder/${this.peopleType}/${this.peopleId}`).then(response => {
            this.customData = response.data;
        });
    },

    methods: {
        makeTitle( slug ) {
            let words = slug.split('-');

            for( let i = 0; i < words.length; i++ ) {
                let word = words[i].replace('_', ' ');
                words[i] = word.charAt(0).toUpperCase() + word.slice(1);
            }

            return words.join(' ');
        },

        formatData( data ) {
            if ( 'string' === typeof data ) {
                return data;
            }

            if ( Array.isArray( data ) ) {
                return data.join(', ');
            }

            return data.name + ': ' + data.value;
        }
    }
}
</script>
