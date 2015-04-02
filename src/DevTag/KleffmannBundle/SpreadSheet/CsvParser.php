<?php

namespace DevTag\KleffmannBundle\SpreadSheet;

class CsvParser
{
    /**
     * @var resource $handle
     */
    protected $handle;

    /**
     * @var string $filename
     */
    protected $filename;

    /**
     * @var string $mode
     */
    protected $mode;

    /**
     * @param $filename
     * @param string $mode
     */
    public function __construct($filename, $mode = 'r')
    {
        $this->filename = $filename;
        $this->mode = $mode;
    }

    public function __destruct()
    {
        $this->close();
    }

    /**
     * @return bool
     */
    public function open()
    {
        if ($this->handle) {
            return true;
        }

        $this->handle = fopen($this->filename, $this->mode);

        return true;
    }

    /**
     * @return bool
     */
    public function close()
    {
        return fclose($this->handle);
    }

    /**
     * @return array
     */
    public function getData()
    {
        $this->open();

        return $this->readFile();
    }

    /**
     * @return array
     */
    public function getColumnNames()
    {
        $this->open();

        return fgetcsv($this->handle);
    }

    /**
     * @return array
     */
    public function readFile()
    {
        $rows = [];
        $columnNames = $this->getColumnNames();

        while ($row = fgetcsv($this->handle)) {
            $rows[] = $this->buildRow($columnNames, $row);
        }

        return $rows;
    }

    /**
     * @param array $row
     * @param array $columnNames
     *
     * @return array
     */
    protected function buildRow(array $columnNames, array $row)
    {
        $rowKeyValue = [];

        foreach ($row as $key => $value) {
            $rowKeyValue[$columnNames[$key]] = $value;
        }

        return $rowKeyValue;
    }
}
