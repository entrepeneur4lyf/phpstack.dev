import React from 'react';
import { InlineCodeHighlight as MantineInlineCodeHighlight } from '@mantine/code-highlight';

function InlineCodeHighlight({ wire, mingleData }) {
    const {
        code,
        language,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineInlineCodeHighlight
            code={code}
            language={language}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default InlineCodeHighlight;
