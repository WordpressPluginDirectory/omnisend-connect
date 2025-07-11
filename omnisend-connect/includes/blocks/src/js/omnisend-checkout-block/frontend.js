import { registerCheckoutBlock } from '@woocommerce/blocks-checkout';

import Block from './block';
import BlockSms from './block-sms';
import metadata from './block.json';
import metadataSms from './block-sms.json';

registerCheckoutBlock( {
	metadata,
	component: Block,
} );

registerCheckoutBlock( {
	metadata: metadataSms,
	component: BlockSms,
} );