import React from 'react';
import { Box as MantineBox } from '@mantine/core';

function Box({ wire, mingleData, children }) {
    const {
        component,
        bg,
        m,
        mx,
        my,
        mt,
        mb,
        ml,
        mr,
        p,
        px,
        py,
        pt,
        pb,
        pl,
        pr,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineBox
            component={component}
            bg={bg}
            m={m}
            mx={mx}
            my={my}
            mt={mt}
            mb={mb}
            ml={ml}
            mr={mr}
            p={p}
            px={px}
            py={py}
            pt={pt}
            pb={pb}
            pl={pl}
            pr={pr}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineBox>
    );
}

export default Box;
