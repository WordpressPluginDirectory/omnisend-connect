import {
	useBlockProps,
} from '@wordpress/block-editor';
import { CheckboxControl } from '@woocommerce/blocks-checkout';
import { getSetting } from '@woocommerce/settings';
import './styles.css';

const { sms } = getSetting( 'omnisend_consent_data', '' );

export const EditSms = () => {
	const blockProps = useBlockProps();

	if(!sms.optInEnabled) {
		return <div></div>;
	}

	return (
		<div { ...blockProps } id="omnisend-subscribe-block">
				<CheckboxControl style={{ marginTop: 0, lineHeight: 'normal' }}  id="sms-text" disabled={ true }>
				{sms.optInText}
				</CheckboxControl>
		</div>
	);
};
