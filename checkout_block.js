const settings_uni = window.wc.wcSettings.getSetting('unipayment_data', {});
const label_uni = window.wp.htmlEntities.decodeEntities(settings_uni.title) || window.wp.i18n.__('UniPayment for woocommerce', 'unipayment');
const Content = () => {
    return window.wp.htmlEntities.decodeEntities(settings_uni.description || '');
};
const Block_Gateway_Uni = {
    name: 'unipayment',
    label: label_uni,
    content: Object(window.wp.element.createElement)(Content, null ),
    edit: Object(window.wp.element.createElement)(Content, null ),
    canMakePayment: () => true,
    ariaLabel: label_uni,
    supports: {
        features: settings_uni.supports,
    },
};
window.wc.wcBlocksRegistry.registerPaymentMethod( Block_Gateway_Uni );
 