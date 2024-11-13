import React from 'react';
import { Container, Group, Burger, Text, TextInput, Transition, Paper } from '@mantine/core';
import { IconSearch } from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

export default function HeaderSearch() {
  const { appName, mainLinks, searchData } = useComponent();
  const [opened, setOpened] = React.useState(false);
  const [search, setSearch] = React.useState('');
  const [showResults, setShowResults] = React.useState(false);

  // Filter search results based on input
  const filteredResults = search !== '' 
    ? searchData.filter(item => 
        item.title.toLowerCase().includes(search.toLowerCase()) ||
        item.description.toLowerCase().includes(search.toLowerCase())
      )
    : [];

  return (
    <Container size="md">
      <div className="flex justify-between items-center h-16">
        <Text fw="bold" size="xl">{appName}</Text>

        {/* Show on desktop, hide on mobile */}
        <Group gap={5} className="flex-1 justify-center" visibleFrom="sm">
          <div className="w-[400px] relative">
            <TextInput
              placeholder="Search"
              icon={<IconSearch size="1rem" />}
              value={search}
              onChange={(event) => {
                setSearch(event.currentTarget.value);
                setShowResults(true);
              }}
              onFocus={() => setShowResults(true)}
              onBlur={() => setTimeout(() => setShowResults(false), 200)}
            />
            
            <Transition mounted={showResults && filteredResults.length > 0} transition="pop-top-left" duration={200}>
              {(styles) => (
                <Paper
                  className="absolute top-full left-0 right-0 mt-1 z-50"
                  shadow="md"
                  p="md"
                  style={styles}
                >
                  {filteredResults.map((item, index) => (
                    <div
                      key={index}
                      className="p-2 hover:bg-gray-100 cursor-pointer rounded"
                    >
                      <Text size="sm" fw={500}>{item.title}</Text>
                      <Text size="xs" c="dimmed">{item.description}</Text>
                    </div>
                  ))}
                </Paper>
              )}
            </Transition>
          </div>

          {mainLinks.map((link) => (
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
            <TextInput
              placeholder="Search"
              icon={<IconSearch size="1rem" />}
              value={search}
              onChange={(event) => setSearch(event.currentTarget.value)}
            />

            {filteredResults.length > 0 && (
              <Paper className="mt-2" p="md">
                {filteredResults.map((item, index) => (
                  <div
                    key={index}
                    className="p-2 hover:bg-gray-100 cursor-pointer rounded"
                  >
                    <Text size="sm" fw={500}>{item.title}</Text>
                    <Text size="xs" c="dimmed">{item.description}</Text>
                  </div>
                ))}
              </Paper>
            )}

            <div className="border-t border-gray-200 pt-4">
              {mainLinks.map((link) => (
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
