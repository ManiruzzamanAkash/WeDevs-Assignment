// imports
import CustomerExtraFieldsTop from 'admin/components/CustomerExtraFieldsTop.vue';
import CustomerExtraFieldsMiddle from 'admin/components/CustomerExtraFieldsMiddle.vue';
import CustomerExtraFieldsBottom from 'admin/components/CustomerExtraFieldsBottom.vue';

import VendorExtraFieldsTop from 'admin/components/VendorExtraFieldsTop.vue';
import VendorExtraFieldsMiddle from 'admin/components/VendorExtraFieldsMiddle.vue';
import VendorExtraFieldsBottom from 'admin/components/VendorExtraFieldsBottom.vue';

// customer
acct.addFilter('acctPeopleExtraFieldsTop', 'CustomerFieldsTop', CustomerExtraFieldsTop);
acct.addFilter('acctPeopleExtraFieldsMiddle', 'CustomerFieldsMiddle', CustomerExtraFieldsMiddle);
acct.addFilter('acctPeopleExtraFieldsBottom', 'CustomerFieldsBottom', CustomerExtraFieldsBottom);

// vendor
acct.addFilter('acctPeopleExtraFieldsTop', 'VendorFieldsTop', VendorExtraFieldsTop);
acct.addFilter('acctPeopleExtraFieldsMiddle', 'VendorFieldsMiddle', VendorExtraFieldsMiddle);
acct.addFilter('acctPeopleExtraFieldsBottom', 'VendorFieldsBottom', VendorExtraFieldsBottom);

// show meta
import PeopleMetaData from 'admin/components/PeopleMetaData.vue';

acct.addFilter('acctPeopleMeta', 'PeopleMeta', PeopleMetaData);
