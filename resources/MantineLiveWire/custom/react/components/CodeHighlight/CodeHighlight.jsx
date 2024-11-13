import React from 'react';
import { CodeHighlight as MantineCodeHighlight } from '@mantine/code-highlight';

function CodeHighlight({ wire, mingleData }) {
    const {
        code,
        language,
        copyLabel,
        copiedLabel,
        withCopyButton,
        withExpandButton,
        defaultExpanded,
        expandCodeLabel,
        collapseCodeLabel,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineCodeHighlight
            code={code}
            language={language}
            copyLabel={copyLabel}
            copiedLabel={copiedLabel}
            withCopyButton={withCopyButton}
            withExpandButton={withExpandButton}
            defaultExpanded={defaultExpanded}
            expandCodeLabel={expandCodeLabel}
            collapseCodeLabel={collapseCodeLabel}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default CodeHighlight;
