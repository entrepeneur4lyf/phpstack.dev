import React from 'react';
import { Accordion as MantineAccordion } from '@mantine/core';

function Accordion({ wire, mingleData, children }) {
    const {
        value,
        defaultValue,
        onChange,
        multiple,
        variant,
        radius,
        chevronPosition,
        disableChevronRotation,
        chevron,
        order,
        transitionDuration,
        unstyled,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineAccordion
            value={value}
            defaultValue={defaultValue}
            onChange={onChange ? (value) => wire.emit('change', value) : undefined}
            multiple={multiple}
            variant={variant}
            radius={radius}
            chevronPosition={chevronPosition}
            disableChevronRotation={disableChevronRotation}
            chevron={chevron}
            order={order}
            transitionDuration={transitionDuration}
            unstyled={unstyled}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineAccordion>
    );
}

Accordion.Item = function AccordionItem({ wire, mingleData, children }) {
    const { value } = mingleData;

    return (
        <MantineAccordion.Item value={value}>
            {children}
        </MantineAccordion.Item>
    );
};

Accordion.Control = function AccordionControl({ wire, mingleData, children }) {
    const { icon, disabled } = mingleData;

    return (
        <MantineAccordion.Control icon={icon} disabled={disabled}>
            {children}
        </MantineAccordion.Control>
    );
};

Accordion.Panel = function AccordionPanel({ wire, mingleData, children }) {
    return (
        <MantineAccordion.Panel>
            {children}
        </MantineAccordion.Panel>
    );
};

export default Accordion;
