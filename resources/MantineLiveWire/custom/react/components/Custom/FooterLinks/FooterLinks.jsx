import React from 'react';
import { Container, Group, Stack, Text, Anchor } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function FooterLinks() {
  const { data } = useComponent();

  const groups = data.map((group) => {
    const links = group.links.map((link) => (
      <Anchor
        key={link.label}
        href={link.href}
        className="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100"
        size="sm"
      >
        {link.label}
      </Anchor>
    ));

    return (
      <Stack key={group.title} gap={8}>
        <Text fw={500} className="text-gray-900 dark:text-gray-100">
          {group.title}
        </Text>
        <Stack gap={8}>
          {links}
        </Stack>
      </Stack>
    );
  });

  return (
    <footer className="border-t border-gray-200 dark:border-gray-800">
      <Container className="py-12">
        <Group className="justify-between" wrap="wrap" gap={32}>
          <div className="max-w-[200px]">
            <Text size="sm" className="text-gray-600 dark:text-gray-400">
              {data.description}
            </Text>
          </div>
          <Group gap={48} className="justify-end flex-1 wrap" wrap="wrap">
            {groups}
          </Group>
        </Group>
      </Container>
    </footer>
  );
}
