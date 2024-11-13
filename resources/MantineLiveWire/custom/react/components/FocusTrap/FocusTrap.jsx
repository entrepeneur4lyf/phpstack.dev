import React from 'react';
import { FocusTrap as MantineFocusTrap } from '@mantine/core';

function FocusTrap({ wire, mingleData, children }) {
    const {
        active,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineFocusTrap
            active={active}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineFocusTrap>
    );
}

FocusTrap.InitialFocus = function FocusTrapInitialFocus() {
    return <MantineFocusTrap.InitialFocus />;
};

export default FocusTrap;
