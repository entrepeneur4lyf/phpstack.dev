import React from 'react';
import { CodeHighlightTabs as MantineCodeHighlightTabs } from '@mantine/code-highlight';

function CodeHighlightTabs({ wire, mingleData }) {
    const {
        code,
        withExpandButton,
        defaultExpanded,
        expandCodeLabel,
        collapseCodeLabel,
        getFileIcon,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineCodeHighlightTabs
            code={code}
            withExpandButton={withExpandButton}
            defaultExpanded={defaultExpanded}
            expandCodeLabel={expandCodeLabel}
            collapseCodeLabel={collapseCodeLabel}
            getFileIcon={getFileIcon}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default CodeHighlightTabs;
