<?php
/**
 * Configuration
 */

namespace UniPayment\SDK;

/**
 * Configuration
 */
final class Configuration
{
    /**
     * Client ID
     *
     * @var string
     */
    protected string $clientId = '';

    /**
     * Client Secret
     *
     * @var string
     */
    protected string $clientSecret = '';

    /**
     * Api Host
     *
     * @var string
     */
    protected string $apiHost = 'https://api.unipayment.io';

    /**
     * Sandbox switch (default set to false)
     *
     * @var bool
     */
    protected bool $isSandbox = false;

    /**
     * Api Version
     *
     * @var string
     */
    protected string $apiVersion = '1.0';

    /**
     * App ID
     *
     * @var string
     */
    protected string $appId = '';

    /**
     * Debug switch (default set to false)
     *
     * @var bool
     */
    protected bool $debug = false;

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected string $debugFile = 'php://output';

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected string $tempFolderPath;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tempFolderPath = sys_get_temp_dir();
        $this->setIsSandbox(true);
    }

    /**
     * Set Client ID
     *
     * @param string $clientId Client ID
     *
     */
    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * Gets the Client ID
     *
     * @return string Client ID
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * Set Client Secret
     *
     * @param string $clientSecret Client Secret
     *
     */
    public function setClientSecret(string $clientSecret): void
    {
        $this->clientSecret = $clientSecret;
    }

    /**
     * Gets API key
     *
     * @return string API key
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * Sets the API host
     *
     * @param string $apiHost API Host
     *
     */
    public function setApiHost(string $apiHost): void
    {
        $this->apiHost = $apiHost;
    }

    /**
     * Gets the API Host
     *
     * @return string API Host
     */
    public function getHost(): string
    {
        return $this->apiHost;
    }

    /**
     * Sets isSandbox flag
     *
     * @param bool $isSandbox IsSandbox flag
     *
     */
    public function setIsSandbox(bool $isSandbox): void
    {
        $this->isSandbox = $isSandbox;
        if ($this->isSandbox) {
            $this->apiHost = "https://sandbox-api.unipayment.io";
        } else {
            $this->apiHost = "https://api.unipayment.io";
        }
    }

    /**
     * Gets the isSandbox flag
     *
     * @return bool
     */
    public function getIsSandbox(): bool
    {
        return $this->isSandbox;
    }

    /**
     * Sets the API Version
     *
     * @param string $apiVersion API Version
     *
     */
    public function setApiVersion(string $apiVersion): void
    {
        $this->apiVersion = $apiVersion;
    }

    /**
     * Gets the API Version
     *
     * @return string API Version
     */
    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    /**
     * Sets the App Id
     *
     * @param string $appId App Id
     *
     */
    public function setAppId(string $appId): void
    {
        $this->appId = $appId;
    }

    /**
     * Gets the API Version
     *
     * @return string API Version
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * Sets debug flag
     *
     * @param bool $debug Debug flag
     *
     */
    public function setDebug(bool $debug): void
    {
        $this->debug = $debug;
    }

    /**
     * Gets the debug flag
     *
     * @return bool
     */
    public function getDebug(): bool
    {
        return $this->debug;
    }

    /**
     * Sets the debug file
     *
     * @param string $debugFile Debug file
     *
     */
    public function setDebugFile(string $debugFile): void
    {
        $this->debugFile = $debugFile;
    }

    /**
     * Gets the debug file
     *
     * @return string
     */
    public function getDebugFile(): string
    {
        return $this->debugFile;
    }

    /**
     * Sets the temp folder path
     *
     * @param string $tempFolderPath Temp folder path
     *
     */
    public function setTempFolderPath(string $tempFolderPath): void
    {
        $this->tempFolderPath = $tempFolderPath;
    }

    /**
     * Gets the temp folder path
     *
     * @return string Temp folder path
     */
    public function getTempFolderPath(): string
    {
        return $this->tempFolderPath;
    }

    /**
     * Gets the essential information for debugging
     *
     * @return string The report for debugging
     */
    public function toDebugReport(): string
    {
        $report = 'PHP SDK (UniPayment\Client) Debug Report:' . PHP_EOL;
        $report .= '    OS: ' . php_uname() . PHP_EOL;
        $report .= '    PHP Version: ' . PHP_VERSION . PHP_EOL;
        $report .= '    OpenAPI Spec Version: 1.0.0' . PHP_EOL;
        $report .= '    Temp Folder Path: ' . $this->getTempFolderPath() . PHP_EOL;
        return $report;
    }

}
