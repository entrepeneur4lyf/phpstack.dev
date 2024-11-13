import React from 'react';
import { Container, Group, ActionIcon, Text } from '@mantine/core';
import * as Icons from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

export default function FooterSocial() {
  const { socialLinks } = useComponent();

  const icons = socialLinks.map((link) => {
    const IconComponent = Icons[`Icon${link.icon.split('-').map(s => s.charAt(0).toUpperCase() + s.slice(1)).join('')}`];
    
    return (
      <ActionIcon
        key={link.label}
        size="lg"
        variant="subtle"
        component="a"
        href={link.href}
        aria-label={link.label}
        className="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100"
      >
        <IconComponent size={18} />
      </ActionIcon>
    );
  });

  return (
    <footer className="border-t border-gray-200 dark:border-gray-800">
      <Container className="py-8">
        <Group justify="space-between">
          <Text size="sm" className="text-gray-600 dark:text-gray-400">
            © 2024 MantineLivewire. All rights reserved.
          </Text>

          <Group gap="xs" className="justify-end" wrap="nowrap">
            {icons}
          </Group>
        </Group>
      </Container>
    </footer>
  );
}
