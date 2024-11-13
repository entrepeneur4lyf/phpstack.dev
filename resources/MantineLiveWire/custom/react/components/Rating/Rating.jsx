import React from 'react';
import { Rating as MantineRating } from '@mantine/core';

function Rating({ wire, mingleData }) {
    const {
        color,
        size,
        count,
        highlightSelectedOnly,
        value,
        defaultValue,
        readOnly,
        fractions,
        emptySymbol,
        fullSymbol,
    } = mingleData;

    return (
        <MantineRating
            color={color}
            size={size}
            count={count}
            highlightSelectedOnly={highlightSelectedOnly}
            value={value}
            defaultValue={defaultValue}
            readOnly={readOnly}
            fractions={fractions}
            emptySymbol={emptySymbol}
            fullSymbol={fullSymbol}
            onChange={(value) => wire.emit('change', value)}
        />
    );
}

export default Rating;
