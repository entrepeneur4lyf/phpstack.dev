import React from 'react';
import { Breadcrumbs as MantineBreadcrumbs } from '@mantine/core';

function Breadcrumbs({ wire, mingleData, children }) {
    const {
        separator,
        separatorMargin,
        classNames,
        styles,
        unstyled,
    } = mingleData;

    return (
        <MantineBreadcrumbs
            separator={separator}
            separatorMargin={separatorMargin}
            classNames={classNames}
            styles={styles}
            unstyled={unstyled}
        >
            {children}
        </MantineBreadcrumbs>
    );
}

export default Breadcrumbs;
