<?php

namespace Aphly\LaravelOss;

use League\Flysystem\Config;
use League\Flysystem\FileAttributes;
use League\Flysystem\FilesystemException;
use League\Flysystem\InvalidVisibilityProvided;
use League\Flysystem\UnableToCheckExistence;
use League\Flysystem\UnableToCopyFile;
use League\Flysystem\UnableToCreateDirectory;
use League\Flysystem\UnableToDeleteDirectory;
use League\Flysystem\UnableToDeleteFile;
use League\Flysystem\UnableToMoveFile;
use League\Flysystem\UnableToReadFile;
use League\Flysystem\UnableToRetrieveMetadata;
use League\Flysystem\UnableToWriteFile;
use OSS\OssClient;

class OssAdapter implements \League\Flysystem\FilesystemAdapter
{
    public $client;

    public $bucket;

    public $url;

    function __construct($accessId, $accessKey, $endPoint,$isCname,$bucket,$url)
    {
        $this->client = new OssClient($accessId, $accessKey, $endPoint, $isCname);
        $this->bucket = $bucket;
        $this->url = $url;
    }

    public function getUrl($path)
    {
        return $this->url.'/'.$path;
    }

    /**
     * @inheritDoc
     */
    public function fileExists(string $path): bool
    {
        // TODO: Implement fileExists() method.
        return $this->client->doesObjectExist($this->bucket, $path);
    }

    /**
     * @inheritDoc
     */
    public function directoryExists(string $path): bool
    {
        // TODO: Implement directoryExists() method.
        return $this->client->doesObjectExist($this->bucket, $path);
    }

    /**
     * @inheritDoc
     */
    public function write(string $path, string $contents, Config $config): void
    {
        // TODO: Implement write() method.
        try {
            $this->client->putObject($this->bucket, $path, $contents);
        } catch (\Exception $exception) {
            throw UnableToWriteFile::atLocation($path, $exception->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function writeStream(string $path, $contents, Config $config): void
    {
        // TODO: Implement writeStream() method.
        try {
            $this->client->uploadStream($this->bucket, $path, $contents, []);
        } catch (\Exception $exception) {
            throw UnableToWriteFile::atLocation($path, $exception->getErrorCode(), $exception);
        }
    }

    /**
     * @inheritDoc
     */
    public function read(string $path): string
    {
        // TODO: Implement read() method.
        try {
            return $this->client->getObject($this->bucket, $path);
        } catch (\Exception $exception) {
            throw UnableToReadFile::fromLocation($path, $exception->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function readStream(string $path)
    {
        // TODO: Implement readStream() method.
    }

    /**
     * @inheritDoc
     */
    public function delete(string $path): void
    {
        // TODO: Implement delete() method.
        try {
            $this->client->deleteObject($this->bucket, $path);
        } catch (\Exception $ossException) {
            throw UnableToDeleteFile::atLocation($path);
        }
    }

    /**
     * @inheritDoc
     */
    public function deleteDirectory(string $path): void
    {
        // TODO: Implement deleteDirectory() method.
    }

    /**
     * @inheritDoc
     */
    public function createDirectory(string $path, Config $config): void
    {
        // TODO: Implement createDirectory() method.
    }

    /**
     * @inheritDoc
     */
    public function setVisibility(string $path, string $visibility): void
    {
        // TODO: Implement setVisibility() method.
    }

    /**
     * @inheritDoc
     */
    public function visibility(string $path): FileAttributes
    {
        // TODO: Implement visibility() method.
    }

    /**
     * @inheritDoc
     */
    public function mimeType(string $path): FileAttributes
    {
        // TODO: Implement mimeType() method.
    }

    /**
     * @inheritDoc
     */
    public function lastModified(string $path): FileAttributes
    {
        // TODO: Implement lastModified() method.
    }

    /**
     * @inheritDoc
     */
    public function fileSize(string $path): FileAttributes
    {
        // TODO: Implement fileSize() method.
    }

    /**
     * @inheritDoc
     */
    public function listContents(string $path, bool $deep): iterable
    {
        // TODO: Implement listContents() method.

    }

    /**
     * @inheritDoc
     */
    public function move(string $source, string $destination, Config $config): void
    {
        // TODO: Implement move() method.
    }

    /**
     * @inheritDoc
     */
    public function copy(string $source, string $destination, Config $config): void
    {
        // TODO: Implement copy() method.
    }
}
