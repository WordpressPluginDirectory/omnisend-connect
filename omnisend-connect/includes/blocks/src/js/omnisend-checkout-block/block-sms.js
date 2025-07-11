import { useEffect, useState } from '@wordpress/element';
import { CheckboxControl } from '@woocommerce/blocks-checkout';
import { getSetting } from '@woocommerce/settings';
import './styles.css';

const { sms } = getSetting( 'omnisend_consent_data', '' );

const BlockSms = ( { checkoutExtensionData } ) => {
	const [ checked, setChecked ] = useState( false );
	const { setExtensionData } = checkoutExtensionData;

	useEffect( () => {
		setExtensionData( 'omnisend_consent', 'optin-sms', checked );
	}, [
		checked,
		setExtensionData,
	] );

	if (!sms.optInEnabled) {
		return null;
	}

	return (
		<div id="omnisend-subscribe-block">
			<CheckboxControl
				id="subscribe-to-sms"
				checked={ checked }
				onChange={ setChecked }
			>
				{ sms.optInText }
			</CheckboxControl>
		</div>
	);
};

export default BlockSms;
