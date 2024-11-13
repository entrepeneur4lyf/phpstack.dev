import React from 'react';
import { MantineProvider } from '@mantine/core';

export default function BaseLayout({ children }) {
  return (
    <MantineProvider>
      {children}
    </MantineProvider>
  );
}
