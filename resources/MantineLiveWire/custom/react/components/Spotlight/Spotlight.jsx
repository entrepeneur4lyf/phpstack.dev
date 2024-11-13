import React from 'react';
import { Spotlight as MantineSpotlight, spotlight } from '@mantine/spotlight';

// Export spotlight object for use in other components
export { spotlight };

function Spotlight({ wire, mingleData }) {
    const {
        actions,
        shortcut,
        searchProps,
        nothingFound,
        highlightQuery,
        limit,
        scrollable,
        maxHeight,
        query,
        onQueryChange,
        store,
        classNames,
        styles,
    } = mingleData;

    // For compound components usage
    Spotlight.Root = MantineSpotlight.Root;
    Spotlight.Search = MantineSpotlight.Search;
    Spotlight.ActionsList = MantineSpotlight.ActionsList;
    Spotlight.Action = MantineSpotlight.Action;
    Spotlight.ActionsGroup = MantineSpotlight.ActionsGroup;
    Spotlight.Empty = MantineSpotlight.Empty;

    return (
        <MantineSpotlight
            actions={actions}
            shortcut={shortcut}
            searchProps={searchProps}
            nothingFound={nothingFound}
            highlightQuery={highlightQuery}
            limit={limit}
            scrollable={scrollable}
            maxHeight={maxHeight}
            query={query}
            onQueryChange={onQueryChange}
            store={store}
            classNames={classNames}
            styles={styles}
        />
    );
}

// Add compound components as static properties
Spotlight.Root = MantineSpotlight.Root;
Spotlight.Search = MantineSpotlight.Search;
Spotlight.ActionsList = MantineSpotlight.ActionsList;
Spotlight.Action = MantineSpotlight.Action;
Spotlight.ActionsGroup = MantineSpotlight.ActionsGroup;
Spotlight.Empty = MantineSpotlight.Empty;

export default Spotlight;
