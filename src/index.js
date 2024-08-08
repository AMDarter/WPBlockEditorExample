import { registerBlockType } from '@wordpress/blocks';
import { RichText } from '@wordpress/block-editor';

registerBlockType('my-plugin/my-block', {
    title: 'My Block',
    icon: 'smiley',
    category: 'common',
    attributes: {
        content: {
            type: 'string',
            source: 'html',
            selector: 'p',
        },
    },
    edit: ({ attributes, setAttributes }) => {
        const { content } = attributes;

        return (
            <RichText
                tagName="p"
                value={content}
                onChange={(newContent) => setAttributes({ content: newContent })}
            />
        );
    },
    save: ({ attributes }) => {
        const { content } = attributes;

        return <RichText.Content tagName="p" value={content} />;
    },
});
