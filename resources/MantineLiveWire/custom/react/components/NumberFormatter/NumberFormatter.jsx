import React from 'react';
import { NumberFormatter as MantineNumberFormatter } from '@mantine/core';

function NumberFormatter({ wire, mingleData }) {
    const {
        value,
        prefix,
        suffix,
        thousandSeparator,
        decimalSeparator,
        thousandsGroupStyle,
        decimalScale,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineNumberFormatter
            value={value}
            prefix={prefix}
            suffix={suffix}
            thousandSeparator={thousandSeparator}
            decimalSeparator={decimalSeparator}
            thousandsGroupStyle={thousandsGroupStyle}
            decimalScale={decimalScale}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default NumberFormatter;
