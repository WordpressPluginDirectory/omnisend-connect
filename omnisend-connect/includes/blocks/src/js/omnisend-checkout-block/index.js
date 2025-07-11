import { registerBlockType } from '@wordpress/blocks';
import { Icon, box } from '@wordpress/icons';

import { Edit } from './edit';
import { EditSms } from './edit-sms';
import metadata from './block.json';
import metadataSms from './block-sms.json';

registerBlockType(metadata, {
	icon: {
		src: <Icon icon={box} />,
	},
	edit: Edit,
});

registerBlockType(metadataSms, {
	icon: {
		src: <Icon icon={box} />,
	},
	edit: EditSms,
});