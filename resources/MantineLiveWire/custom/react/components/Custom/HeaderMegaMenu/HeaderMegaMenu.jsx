import React from 'react';
import { Container, Group, Burger, Text, Menu, SimpleGrid, UnstyledButton } from '@mantine/core';
import { IconChevronDown } from '@tabler/icons-react';
import * as Icons from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

export default function HeaderMegaMenu() {
  const { appName, mainLinks, megaMenu, userLinks } = useComponent();
  const [opened, setOpened] = React.useState(false);

  return (
    <Container size="md">
      <div className="flex justify-between items-center h-16">
        <Text fw="bold" size="xl">{appName}</Text>

        {/* Show on desktop, hide on mobile */}
        <Group gap={5} visibleFrom="sm">
          {mainLinks.map((link) => (
            <Text
              key={link.label}
              className="cursor-pointer hover:underline"
            >
              {link.label}
            </Text>
          ))}

          <Menu
            trigger="hover"
            openDelay={100}
            closeDelay={400}
            width={600}
            offset={0}
          >
            <Menu.Target>
              <UnstyledButton className="flex items-center">
                <Text>Features</Text>
                <IconChevronDown size="1rem" className="ml-2" />
              </UnstyledButton>
            </Menu.Target>

            <Menu.Dropdown>
              <SimpleGrid cols={2} spacing="xl">
                {megaMenu.map((section) => {
                  const IconComponent = Icons[`Icon${section.icon.split('-').map(s => s.charAt(0).toUpperCase() + s.slice(1)).join('')}`];
                  
                  return (
                    <div key={section.title} className="p-4">
                      <Group>
                        <IconComponent size="2rem" />
                        <div>
                          <Text fw={500}>{section.title}</Text>
                          <Text size="sm" c="dimmed">{section.description}</Text>
                        </div>
                      </Group>

                      <div className="mt-4 space-y-2">
                        {section.links.map((link) => (
                          <Text
                            key={link.label}
                            size="sm"
                            className="cursor-pointer hover:underline"
                          >
                            {link.label}
                          </Text>
                        ))}
                      </div>
                    </div>
                  );
                })}
              </SimpleGrid>
            </Menu.Dropdown>
          </Menu>

          {userLinks.map((link) => (
            <Text
              key={link.label}
              className="cursor-pointer hover:underline"
            >
              {link.label}
            </Text>
          ))}
        </Group>

        {/* Show on mobile, hide on desktop */}
        <Burger
          opened={opened}
          onClick={() => setOpened((o) => !o)}
          hiddenFrom="sm"
          size="sm"
        />
      </div>

      {/* Mobile menu */}
      {opened && (
        <div className="sm:hidden border-t border-gray-200">
          <div className="py-4 space-y-4">
            {mainLinks.map((link) => (
              <Text
                key={link.label}
                className="block cursor-pointer hover:underline"
              >
                {link.label}
              </Text>
            ))}

            <div className="border-t border-gray-200 pt-4">
              <Text fw={500} className="mb-2">Features</Text>
              {megaMenu.map((section) => (
                <div key={section.title} className="mb-4">
                  <Text fw={500} size="sm">{section.title}</Text>
                  {section.links.map((link) => (
                    <Text
                      key={link.label}
                      size="sm"
                      className="block cursor-pointer hover:underline mt-1"
                      c="dimmed"
                    >
                      {link.label}
                    </Text>
                  ))}
                </div>
              ))}
            </div>

            <div className="border-t border-gray-200 pt-4">
              {userLinks.map((link) => (
                <Text
                  key={link.label}
                  className="block cursor-pointer hover:underline mb-2"
                >
                  {link.label}
                </Text>
              ))}
            </div>
          </div>
        </div>
      )}
    </Container>
  );
}
